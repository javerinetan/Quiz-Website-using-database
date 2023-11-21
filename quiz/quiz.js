
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
    var questionContainers = document.querySelectorAll('.quiz-question');

    // function showQuestion(questionNumber) {
    //     questionContainers.forEach(function (container, index) {
    //         if (index + 1 === questionNumber) {
    //             container.style.display = 'block';
    //         } else {
    //             container.style.display = 'none';
    //         }
    //     });
    // }
    function showQuestion(questionNumber) {
        questionContainers.forEach(function (container, index) {
            var currentQuestionNo = index + 1;
            if (currentQuestionNo === questionNumber) {
                container.style.display = 'block';

            } else {
                container.style.display = 'none';
            }
        });
    }

    var questionLinks = document.querySelectorAll('.sidebar div div a');
    questionLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var questionNumber = parseInt(this.textContent.match(/\d+/)[0], 10);
            // alert(questionNumber);
            showQuestion(questionNumber);
        });
    });

    var nextQuestion = document.querySelectorAll('.quiz-question a');
    nextQuestion.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            var questionNumber2 = parseInt(this.id);
            showQuestion(questionNumber2);
        });
    });

    // var attemptNextQn = document.querySelectorAll('.attempt_btn');
    // attemptNextQn.forEach(function (link) {
    //     link.addEventListener('click', function (event) {
    //         alert('1');
    //         event.preventDefault();
    //         alert('2');
    //         var questionNumber3 = parseInt(this.id.match(/\d+/)[0], 10);
    //         alert('3');
    //         showQuestion(questionNumber3);
    //     });
    // });
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


