
// register
$(".register-form").on("submit", function(e){ 
    e.preventDefault();
    try {
            
    const hobbitArr = [];
    const checkedHobbies = document.querySelectorAll(".register-form div:last-child input[name='hobbit']:checked");

    //console.log(checkedHobbies)
    //console.log(checkedHobbies[0].value)

    checkedHobbies.forEach((e) => {
        hobbitArr.push(e.value);
    });
    
    const hobbitJoin = hobbitArr.join("|")
    // console.log(hobbitArr);
    // console.log(hobbitJoin)


    const formData = {
        email: $(".register-form input[name='email']").val(),
        password: $(".register-form input[name='password']").val(),
        first_name: $(".register-form input[name='first_name']").val(),
        last_name: $(".register-form input[name='last_name']").val(),
        salary: $(".register-form input[name='salary']").val(),
        department: $(".register-form select[name='department']").val(),
        sex: $(".register-form input[name='sex']:checked").val(),
        hobbit: hobbitJoin,
        type: "user-register"
    }

    if(!formData.email || !formData.password || !formData.first_name || !formData.last_name || !formData.salary || !formData.department || !formData.sex || !formData.hobbit){
        throw new Error("You are missing some fields")
    }

    $.ajax({
        url: "http://localhost:8080/module/users-module/user-controller.php",
        type: "POST",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if(response.message.status === "success"){
                console.log(response.message.email)
                localStorage.setItem("email", response.message.email)
                localStorage.setItem("password", response.message.password)
                window.location.href = "http://localhost:8080/pages/home/home.html"
            }else{
                console.log(response.message.status)
            }
        },
        error: function(xhr, status, error) {
            console.log("Error:", status, error);
        }
    });
    } catch (error) {
        console.log(error)
    }
    
})


$("")