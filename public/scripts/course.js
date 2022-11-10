$(document).ready(function(){
    show_course();


        //csrf token error
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on("click", ".edit", function(){

        var id = $(this).attr('data');

        // empty_form();
        $("#hid").val(id);
        $(".card-title").html('Edit Course');
        $("#btnupdate").removeAttr("hidden");
        $("#btnsubmit").prop("hidden","true");

        $.ajax({
            'type': 'ajax',
            'dataType': 'json',
            'method': 'get',
            'url': 'course/'+id,
            'async': false,
            success: function(data){

                $("#hid").val(data.id);
                $("#name").val(data.name);
            }

        });

        $("#btnupdate").click(function(){

            if($("#hid").val() != ""){

                var id = $("#hid").val();
                var name = $("#name").val();
                swal("Are you sure you want to update?", {
                    buttons: ["cancel", true],
                  }).then((updates)=>{
                    if(updates){
                        $.ajax({
                            'type': 'ajax',
                            'dataType': 'json',
                            'method': 'put',
                            'data' : {name:name},
                            'url': 'course/'+id,
                            'async': false,
                            success:function(data){

                                toastr.success("Course Updated");
                                location.reload();
                            }

                        });
                    }
                });
            }
        });
    });



    $(document).on("click", ".delete", function(){

        var id = $(this).attr('data');

        swal("Are you sure you want to Delete?", {
            buttons: ["cancel", true],
            }).then((updates)=>{
            if(updates){
                $.ajax({
                    'type': 'ajax',
                    'dataType': 'json',
                    'method': 'delete',
                    'url': 'course/'+id,
                    'async': false,
                    success:function(data){

                        toastr.success("Course Deleted");
                        location.reload();
                    }

                });
            }
        });
    });
});

    //Data Table show
    function show_course(){
        blEmployee=$("#tblgforms").DataTable({
        "ajax": {
            url:"course/create",
            "dataSrc": "",
        },
                'columns': [
                    {data: 'name'},

                    {
                    data: null,
                    render: function(d){
                        var html = "";
                        html+="<td><button class='btn btn-warning btn-sm edit' data='"+d.id+"' title='Edit'><i class='fas fa-edit'></i></button>";
                        html+="&nbsp;<button class='btn btn-danger btn-sm delete' data='"+d.id+"' title='Delete'><i class='fas fa-trash'></i></button>";
                        return html;

                    }

                    }
                ]
            });
    }
