async function loadData() {
  try {
    const response = await fetch('json/webdev.json'); // Path relative to HTML file
    const data = await response.json();
    
    let htmlContent = '';
    data.forEach(item => {
      htmlContent += `
      <div class="publication">
        <figure>
          <div class="row"><img src="img/${item.image}" alt=""></div>
          <div class="row flex">
            <figcaption>${item.date}</figcaption>
            <a href="${item.repo}" class="button-primary">
              <i class="fa fa-github"></i> <span class="hide-mobile">Github Repo</span>
            </a>
          </div>
        </figure>
        <div class="row"><p>${item.description}</p></div>
      </div>`;
    });
    
    document.getElementById("content-loader").innerHTML = htmlContent;
  } catch (error) {
    console.error("Error loading data:", error);
  }
}

// Start loading data
loadData();