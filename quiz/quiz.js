
$(document).ready(function () {
            $("#quiz-form").submit(function () {
                var inputs = $("input[type='text']", this);
                for (var i = 0; i < inputs.length; i++) {
                    if (inputs[i].value.trim() === '') {
                        alert('Please fill in all the input fields.');
                        return false;
                    }
                }
                return true;
            });
        });

document.addEventListener('DOMContentLoaded', function () {
    var questionContainers = document.querySelectorAll('.question-container');

    function showQuestion(questionNumber) {
        questionContainers.forEach(function (container, index) {
            if (index + 1 === questionNumber) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    }

    var questionLinks = document.querySelectorAll('.sidebar ul li a');
    questionLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var questionNumber = parseInt(this.textContent.match(/\d+/)[0], 10);
            showQuestion(questionNumber);
        });
    });

    // Show the first question by default
    showQuestion(1);
});

function submitForm() {
        // Check if the form is valid before submitting
        if (document.getElementById('quizForm').checkValidity()) {
            // Add your code to submit the form
            console.log('Form submitted!');
        } else {
            alert('Please fill in all the required fields.');
        }
    }


