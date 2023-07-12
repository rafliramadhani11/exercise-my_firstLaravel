const judul = document.querySelector("#judul");
const slug = document.querySelector("#slug");

judul.addEventListener("change", function () {
    fetch("/dashboard/posts/checkSlug?judul=" + judul.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

const image = document.querySelector("#image");
const imgPreview = document.querySelector(".img-preview");

function PreviewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");

    const reader = new FileReader();
    reader.readAsDataURL(image.files[0]);

    reader.addEventListener("load", (e) => {
        imgPreview.src = e.target.result;
    });
}
