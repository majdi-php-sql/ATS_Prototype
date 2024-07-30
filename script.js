// This page created by Majdi Awad from scratch using JS

// I added an event listener to handle form submission
document.getElementById('applicantForm').addEventListener('submit', function(event) {
    event.preventDefault(); // I prevented the default form submission behavior

    const formData = new FormData(this); // I created a FormData object to handle form data
    const file = document.getElementById('cv').files[0]; // I accessed the uploaded CV file

    const reader = new FileReader(); // I used FileReader to read the file content
    reader.onload = function() {
        const typedArray = new Uint8Array(this.result); // I converted the file result to a typed array

        // I used pdfjsLib to read the PDF document
        pdfjsLib.getDocument({data: typedArray}).promise.then(pdf => {
            let textContent = ''; // I initialized a variable to store the extracted text content

            const pages = []; // I created an array to hold promises for each page's text content
            for (let i = 1; i <= pdf.numPages; i++) {
                pages.push(pdf.getPage(i).then(page => {
                    return page.getTextContent().then(text => {
                        return text.items.map(item => item.str).join(' '); // I joined text items from the page
                    });
                }));
            }

            // I waited for all page text promises to resolve
            Promise.all(pages).then(contents => {
                textContent = contents.join(' '); // I joined the text from all pages

                formData.append('cv_text', textContent); // I appended the extracted text to the FormData object
                fetch('submit.php', {
                    method: 'POST',
                    body: formData // I sent the form data including the CV text to the server
                }).then(response => response.text())
                  .then(result => {
                    alert(result); // I alerted the result from the server
                }).catch(error => {
                    console.error('Error:', error); // I logged any errors that occurred
                });
            });
        });
    };
    reader.readAsArrayBuffer(file); // I read the file as an ArrayBuffer
});

// This page created by Majdi Awad from scratch using JS
