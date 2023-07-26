var descriptionExpanded = false;

function toggleDescription() {
    var description = document.getElementById("description");
    var showMoreButton = document.getElementById("show-more");

    if (description.classList.contains("description-collapsed")) {
        description.classList.remove("description-collapsed");
        description.innerHTML = showMoreButton.dataset.fullDescription;
        showMoreButton.textContent = "Show Less";
        console.log("berhasil show more");
    } else {
        description.classList.add("description-collapsed");
        description.innerHTML = showMoreButton.dataset.limitedDescription;
        showMoreButton.textContent = "Show More";
        console.log("berhasil show less");
    }
    descriptionExpanded = !descriptionExpanded;
}
