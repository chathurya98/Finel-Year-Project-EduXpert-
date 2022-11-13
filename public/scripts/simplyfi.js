// Store in env variables
const BASE_API_PATH = "";

const searchInput = document.getElementById("searchInput");

document.getElementById("searchInput").addEventListener("keyup", (event) => {
  event.preventDefault();
  if (event.keyCode === 13) {
    document.getElementById("searchBtn").click();
  }
});

const search = async () => {
  console.log(searchInput.value);
  const searchResult = await axios.post(`${BASE_API_PATH}/scrape`, {
    seed: searchInput.value,
  });
};

// searchInput.addEventListener("input", (e) => {
//   console.log(e.target.value);
// });
