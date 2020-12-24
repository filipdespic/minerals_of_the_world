const allProducts = [...document.querySelectorAll(".product")];

allProducts.forEach(element => {
    element.addEventListener("click", ()=>window.location.href ="post.html");
});