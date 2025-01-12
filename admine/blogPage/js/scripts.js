/*!
* Start Bootstrap - Blog Post v5.0.9 (https://startbootstrap.com/template/blog-post)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-post/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function toggleEdit() {
    const commentText = document.getElementById('comment-text');
    const editInput = document.getElementById('edit-input');
    const editButton = document.getElementById('edit-button');

    if (editInput.classList.contains('d-none')) {
        commentText.classList.add('d-none');
        editInput.classList.remove('d-none');
        editButton.textContent = 'Save';
    } else {
        const inputField = editInput.querySelector('input');
        commentText.textContent = inputField.value;
        commentText.classList.remove('d-none');
        editInput.classList.add('d-none');
        editButton.textContent = 'Edit';
    }
}
