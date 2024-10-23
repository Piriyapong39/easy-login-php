
// $(".login-form").on("submit", (e)=>{
//     e.preventDefault();


// })


$("#login-btn").on("click", ()=>{
    try {

        const email = $(".login-form input[name='email']").val()
        const password = $(".login-form input[name='password']").val()

        // console.log(email)
        // console.log(password)

        if(!email || !password){
            throw new Error("Email and Password is required")
        }

        const formData = {
            email,
            password
        }

        $.ajax({
            url: "http://localhost:8080/module/user-module/user-controller.php",
            type: "POST",
            data: formData,
            success: function (response) {
                console.log(response);
            },
            error: function (error) {
                console.log(error);
            },
        })
    } catch (error) {
        console.log(error)
    }
})
