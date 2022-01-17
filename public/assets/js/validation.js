var app = new Vue({
    el: '#app',
    data: {
        email: '',
        checkbox: true,
        isDisabled: true,
        domain: [],
        message: [],
        reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
    },
    methods: {
        /*Returns error message if email is invalid*/
        validateEmail: function () {
            /*Checks if email isn't empty*/
            if (this.email !== '') {
                /*Checks if email is valid*/
                if (this.reg.test(this.email)) {
                    this.domain = this.email.split('.')
                    /*Checks if email doesn't end with .co*/
                    if (this.domain[this.domain.length - 1] !== "co") {
                        /*Checks if TOS checkbox is checked*/
                        if (this.checkbox) {
                            this.message['email'] = "";
                            /*If email is valid, submit button is enabled and user can sign up*/
                            this.isDisabled = false;
                        } else {
                            this.message['email'] = "You must accept the terms and conditions";
                        }
                    } else {
                        this.message['email'] = "We are not accepting subscriptions from Colombia emails";
                    }
                } else {
                    this.message['email'] = "Please provide a valid e-mail address";
                }
            } else {
                this.message['email'] = "Email address is required";
            }
        },
        /*Initializes checkbox value*/
        checked: function () {
            this.checkbox = !this.checkbox;
            this.validateEmail();
        }
    }
});
