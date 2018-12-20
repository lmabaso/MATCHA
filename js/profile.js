var add_interest_btn = document.querySelector('#add_interest');

add_interest_btn.addEventListener('click', function(e)
{
    e.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data:  {add_interest: 'true', interest: document.getElementById('interests').value},
        success: function (response) {
            alert("suceessfully added")
            location.reload();
        }
    });
});