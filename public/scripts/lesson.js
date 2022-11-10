//main table for Lessons
var maintbl;
//lessonid and lesson name
var lesson_id,lesson_name;
$("#btn_add").click(function(){

    if($("#type").val()==6){
        if(!($("#attachment_name").val())){
            toastr.error("Please add the Link");
            $("#attachment_name").focus();
            return this;
        }
        insertLink();
        return this;
    }
    if(!($("#attachment_name").val())){
        toastr.error("Please add attchment name");
        $("#attachment_name").focus();
        return this;
    }
    if(!($("#attachment").val())){
        toastr.error("Please add the attachment");
        return this;
    }

   let valid=filevalidation($("#type").val(),$("#attachment").get(0).files[0]);
   if(!valid){
    toastr.error("File type didn't match with current file !");
       return this;
   }

    insertFile($("#attachment").get(0).files[0],$("#type").val());

});

//link adding
function insertLink(){
    let object= {
        "type":$("#type").val(),
        "attachment": $("#attachment_name").val(),
        "drive_id":Math.floor(Date.now() / 1000),
        "attachment_name":$("#attachment_name").val(),
        "lesson_id":lesson_id
    };

    // console.log(object);
    add_to_db(object);
}

// file validation
function filevalidation(type,file){

    switch(type){
        case "0": if(file.type=="video/mp4"){ return true; }    return false;
                break;
        case "1": if(file.type=="application/pdf"){ return true; } return false;
                break;
        case "2": if(file.type=="application/vnd.openxmlformats-officedocument.presentationml.presentation"){ return true; } return false;
                break;
        case "3": if((file.type=="image/jpeg") || (file.type=="image/png")){ return true; } return false;
                break;
        case "4": if(file.type=="application/vnd.ms-excel" || file.type=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){ return true; } return false;
                break;
        case "5": if(file.type=="video/mp4"){ return true; } return false;
                break;
        default: return false;
    }
}


//file upload hold
var upload_progress=0;


/**
 * Insert new file.
 *
 * @param {File} fileData File object to read data from.
 * @param {Function} callback Function to call when the request is complete.
 */
 function insertFile(fileData, type) {

    var attachemnt_name=$("#course option:selected").text()+"_"+lesson_name+"_"+Math.floor(Date.now() / 1000);
    if(type==0 || type==5){
        attachemnt_name=$("#course option:selected").text()+"_"+lesson_name+"_"+Math.floor(Date.now() / 1000)+".mp4";
    }

    const boundary = '-------314159265358979323846';
    const delimiter = "\r\n--" + boundary + "\r\n";
    const close_delim = "\r\n--" + boundary + "--";

    var reader = new FileReader();
    reader.readAsBinaryString(fileData);
    reader.onload = function(e) {
            var contentType = fileData.type || 'application/octet-stream';
            var metadata = {
                'name': attachemnt_name,
                'title': "LMS",
                'mimeType': contentType
            };

            var base64Data = btoa(reader.result);
            var multipartRequestBody =
                delimiter +
                'Content-Type: application/json\r\n\r\n' +
                JSON.stringify(metadata) +
                delimiter +
                'Content-Type: ' + contentType + '\r\n' +
                'Content-Transfer-Encoding: base64\r\n' +
                '\r\n' +
                base64Data +
                close_delim;

            var xhr = new XMLHttpRequest();

            xhr.open('POST', 'https://www.googleapis.com/upload/drive/v3/files', true);

            xhr.setRequestHeader('Content-Type', 'multipart/mixed; boundary="' + boundary + '"');
            xhr.setRequestHeader('authorization', 'Bearer ' + gapi.auth.getToken().access_token);

            xhr.upload.addEventListener("progress", function(e) {
            var pc = parseFloat(e.loaded / e.total * 100).toFixed(2);
            $("#upload_progress").css('width', pc+'%').attr('aria-valuenow', pc);
            upload_progress=1;
            }, false);

            xhr.onreadystatechange = function(e) {
            if (xhr.readyState == 4) {
                upload_progress=0;
                let jsonResponse = JSON.parse(xhr.responseText);
                generatePublicUrl(jsonResponse.id);
            }
            };

            xhr.send(multipartRequestBody);
    }
  }





// giving permission
function generatePublicUrl(fileId){
    gapi.client.load('drive', 'v3', function() {

        var body = {
            "withLink": true,
            'type': "anyone",
            'role': "reader"
          };
          var request = gapi.client.drive.permissions.insert({
            'fileId': fileId,
            'resource': body
          });
          request.execute(function(resp) {
              if(resp){
               get_public_URL(fileId);
              }
            });

    });
}

//get the oublic url
function get_public_URL(fileId){
    gapi.client.load('drive', 'v3', function() {
        var request = gapi.client.drive.files.get({
            'fileId': fileId
          });
          request.execute(function(resp) {
            // console.log(resp);
            let link=resp.webContentLink;
            if($("#type").val()==0 || $("#type").val()==5){
                link=resp.embedLink;
            }

           let object= {
                "type":$("#type").val(),
                "attachment": link,
                "drive_id":fileId,
                "attachment_name":$("#attachment_name").val(),
                "lesson_id":lesson_id
            };
            add_to_db(object);
          });
    });

}

//adding attachemnts to database
function add_to_db(obj){
    let req=$.ajax({
                url:"/lesson_attachment",
                method:"POST",
                async:true,
                contentType:"application/json",
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                data:JSON.stringify(obj)
         });
         req.done(function(response){
            toastr.success("File uploaded");
            $("#tbl_attachment").removeAttr("hidden");
            $("#tbl_attachment tbody").append('<tr>'+
            '<td>'+get_Attachment_Type($("#type").val())+'</td>'+
            '<td>'+response.attachment_name+'</td>'+
            '<td><button id="btnview" type="button" onClick="viewAttachment(`'+obj.drive_id+'`,`'+obj.type+'`,`'+response.attachment_name+'`)" class="btn btn-primary btn-sm">View</button> <button onClick="deleteFile(`'+obj.drive_id+'`,this)" type="button"  class="btn btn-danger btn-sm">remove</button></td>'+
            '</tr>' );
            resetupload();
            maintbl.ajax.reload();
         });
         req.fail(function(response){
             console.log(response);
             return false;
         });
    }



//delete file in the Drive using file ID
function deleteFile(fileId,event) {

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

            var request = gapi.client.drive.files.delete({
                'fileId': fileId
              });
              request.execute(function(resp) {
                      if(resp){
                          let ajaxreq= $.ajax({
                              url:"lesson_attachment/"+fileId,
                              method:"DELETE",
                              data: {
                                  "_token": $('meta[name="csrf-token"]').attr('content')
                                  },
                              async:true
                              }
                          );
                          ajaxreq.done(function (respond){
                          if(respond){
                              $(event).closest("tr").remove();
                          }
                          });
                      }
                  });

          swal("file has been deleted!", {
            icon: "success",
          });
        } else {
        //   swal("Your imaginary file is safe!");
        }
      });

  }

//main remove button
function remove_lesson(lesson_id){

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data and files!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

            let getall=$.ajax({
                url:"lesson_attachment/"+lesson_id,
                method:"GET",
                async:true
            });

            getall.done(function(data){
                if(data.length>0){
                    for (let index = 0; index < data.length; index++) {
                        const element = data[index];
                        var request = gapi.client.drive.files.delete({
                            'fileId': element.drive_id
                          });
                          request.execute(function(resp) { });
                    }

                }

                let ajaxreq_delete= $.ajax({
                    url:"lessons/"+lesson_id,
                    method:"DELETE",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content')
                        },
                    async:true
                    }
                );
                ajaxreq_delete.done(function (respond){
                    if(respond){
                        swal("file has been deleted!", {
                            icon: "success",
                          });
                          maintbl.ajax.reload();
                    }
                });
            });


        } else {
        //   swal("Your imaginary file is safe!");
        }
      });

}



//check modal for progreessing
$("#btn_modal_close").click(function(){
    if(upload_progress==1){
        toastr.error("File uploading in progress, Please wait !");
        return this;
    }
    resetModal();

});
$("#btn_modal_close_up").click(function(){
    if(upload_progress==1){
        toastr.error("File uploading in progress, Please wait !");
        return this;
    }
    resetModal();
});


function view_Modal(lessonid,lessonname){
    lesson_name=lessonname;
    lesson_id=lessonid;

    let request=$.ajax({
        url:"lesson_attachment/"+lesson_id,
        method:"GET",
        async:true
    });

    request.done(function(data){
        if(data.length>0){
            $("#tbl_attachment").removeAttr("hidden");
            for (let index = 0; index < data.length; index++) {
                let element = data[index];
                $("#tbl_attachment tbody").append('<tr>'+
                '<td>'+get_Attachment_Type(element.type)+'</td>'+
                '<td>'+element.attachment_name+'</td>'+
                '<td><button id="btnview" type="button" onClick="viewAttachment(`'+element.drive_id+'`,`'+element.type+'`,`'+element.attachment_name+'`)" class="btn btn-primary btn-sm">View</button><button onClick="deleteFile(`'+element.drive_id+'`,this)" type="button" class="btn btn-danger btn-sm">remove</button></td>'+
                '</tr>' );
            }
        }
    });

    $("#add_attachment").modal('show');
}

//view button click
function viewAttachment(link,type,attachement_name){

    if(type==6){
        window.open(attachement_name, '_blank').focus();
        return this;
    }
    if(type==0 || type==5){
        $("#videosrc").attr("src","https://drive.google.com/uc?export=download&id="+link);
        $("#video")[0].load();
        $("#video_title").text(attachement_name);
        $("#video_view").modal('show');

        return this;

    }

    window.location ="https://drive.google.com/uc?export=download&id="+link;
}
//video modal close event
$("#video_view").on('hidden.bs.modal', function (e) {
    console.log('hi');
    $("#video")[0].pause();

});

//modal rest
function resetupload(){
    $("#type").val(0).change();
    $("#attachment").val("");
    $("#attachment_name").val("");
    $("#upload_progress").css('width', 0+'%').attr('aria-valuenow', 0);

}
//modal rest
function resetModal(){
    $("#type").val(0).change();
    $("#attachment").val("");
    $("#attachment_name").val("");
    $("#upload_progress").css('width', 0+'%').attr('aria-valuenow', 0);
    $("#add_attachment").modal('hide');
    $("#tbl_attachment tbody").empty();
    $("#tbl_attachment").attr('hidden',true);
}

//retun the strin value of attachment type
function get_Attachment_Type(type){

    if(type==0){
        return "video";
    }else if(type==1){
        return "pdf";
    }else if(type==2){
        return "presentation";
    }else if(type==3){
        return "image";
    }else if(type==4){
        return "excell";
    }else if(type==5){
        return "downloadable video";
    }else if(type==6){
        return "Link";
    }
}

$(document).ready(function(){

    //initilize data table
    maintbl= $("#tbllessons").DataTable({
        "ajax": {
            url:"lessons",
            "dataSrc": "",
        },
        "columns": [
            { "data": "lesson_no"},
            { "data": "title" },
            { "render": function(data,type,row,meta){
                    if(row.uploads==0){
                        return '<button class="btn btn-secondary" onclick="view_Modal(`'+row.id+'`,`'+row.title+'`)">Add Attachment</button>';
                    }else{
                        return '<button class="btn btn-secondary" onclick="view_Modal(`'+row.id+'`,`'+row.title+'`)">View Attachment</button>';
                    }
                }
            },
            {
                "render": function(data,type,row,meta){
                    return '<button id="btnupdate" class="btn btn-dark" onClick="lesson_Update(`'+row.id+'`)">Update</button>'+
                    ' <button id="btnremove"  class="btn btn-danger" onclick="remove_lesson(`'+row.id+'`)">Remove</button>';
                }
            },
            {
                "data": "course"
            }
        ],
        "columnDefs":[
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": true
            }
        ]
    });
    //end initialization

    //reset data table default view in initialization
    maintbl.columns(4).search(-1).draw();

    //selct 2
    $("#course").select2();

});

//change table data according to course
$("#course").on('change',function(){
    maintbl.columns(4).search('^' + $(this).val() + '$', true, false).draw();

});


//form submition
$("#btnsubmit_lesson").click(function(){

    if(($("#course").val()=="") || ($("#lesson_no").val()=="") || ($("#title").val()=="")){
        toastr.error("Cannot proceed with empty fields");
        return;
    }

    let formData=$("#frmlesson").formToJson();

    let req= $.ajax({
        url:"/lessons",
        method:"POST",
        async: true,
        contentType: "application/json",
        data:JSON.stringify(formData)
    });

    req.done(function(resonse){
        toastr.success('Lesson added success');
        $("#btnclear").click();
        maintbl.ajax.reload();
    });

    req.fail(function(err){
        console.log(err);
    });

});


//lesson update
var lesson_ID;
function lesson_Update(lesson_id){
    lesson_ID=lesson_id;
    $("#btnupdate").removeAttr("hidden");
    $("#minimize").click();
    $("i.fa-plus").click();
    $("#btnsubmit_lesson").prop("hidden","true");
    let lessons=$.ajax({
        url:"lessons/"+lesson_id,
        method:"GET",
        async:true
    });

    lessons.done(function(res){
        $("#lesson_no").val(res.lesson_no);
        $("#title").val(res.title);
        $("#description").val(res.description);
    });
}

$("#btnupdate").click(function(){
    swal("Are you sure you want to update?", {
        buttons: ["cancel", true],
      }).then((updates)=>{
          if(updates){
            let updatedata=$("#frmlesson").formToJson();

            let update_lesson=$.ajax({
                url:"lessons/"+lesson_ID,
                method:"PUT",
                async:true,
                contentType:"application/json",
                data:JSON.stringify(updatedata)
            });

            update_lesson.done(function(response){
                swal("Your file has been updated!", {
                    icon: "success",
                  });
                maintbl.ajax.reload();
                $("#btnsubmit_lesson").removeAttr("hidden");
                $("#btnupdate").prop("hidden","true");
                $("#btnclear").click();
                $("i.fa-plus").click();
            });
            update_lesson.fail(function(res){
                console.log(res);
                swal("Not updated!");
            });

          }else{
            swal("Not updated!");
          }
      });

});

//clear button click function
$("#btnclear").click(function(){
    $("#btnsubmit_lesson").removeAttr("hidden");
    $("#btnupdate").prop("hidden","true");
    $("i.fa-plus").click();

    $("#lesson_no").val('');
    $("#title").val('');
    $("#description").val('');

});
