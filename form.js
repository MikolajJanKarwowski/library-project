const form = document.querySelector("#book-form");
const bookName = document.querySelector("#book-name");
const bookAutor = document.querySelector("#book-autor");
//validate the input
form.onsubmit = e => {
    e.preventDefault()
    const name = bookName.value;
    const autor = bookAutor.value;

    if (name == "" || name == null || autor == "" || autor == null) {
        alert("Please enter the correct information");
        return
    }
    form.submit()

}