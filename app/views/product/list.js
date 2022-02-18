window.addEventListener('DOMContentLoaded', (e) => {
    const btnDeleteProduct = document.querySelector('#delete__btn a');


    function deleteProduct() {
        btnDeleteProduct.addEventListener('click', (e) => {
            preventDefault();
            const target =  e.target;
            console.log(1);


        })
    }
    deleteProduct();
})