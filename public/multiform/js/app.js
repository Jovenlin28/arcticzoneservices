$(document).ready(function() {

    //initialize variable to handle current step count
    let activeStep = 1;
    //initialize variable to handle step class
    let step = "step" + activeStep;

    const unitDetailsCopy = $('div#copy');

    //next button click event capture
    $(document).on('click', '#next_btn', function() {
        //hide previous step
        hideStep(step);
        //iterate activeStep variable to get next step class
        step = "step" + ++activeStep;
        //show next step
        nextStep(step);

        //show back button
        $('#back_btn').attr('style', 'display: block');

        //show submit button if active step is 6 or the step you want to have the submit
        if (activeStep == 6) {
            //hide this(next button) button
            $(this).attr('style', 'display: none');
            //show submit button
            $('#submit_btn').attr('style', 'display: block');
        }
    });

    //back button click event capture
    $(document).on('click', '#back_btn', function() {
        //prevent back button click when active step is 1
        if (activeStep > 1) {
            //hide current step
            hideStep(step);
            //
            step = "step" + --activeStep;
            //show previous step
            nextStep(step);
            //hide back button if active step is 1
            if (activeStep == 1) {
                $('#back_btn').attr('style', 'display: none');
            }
            //hide submit button if active step is not on submit step form
            if (activeStep < 6) {
                //show next button
                $('#next_btn').attr('style', 'display: block');
                //hide submit button
                $('#submit_btn').attr('style', 'display: none');
            }
        }
    });

    //show next step
    //step -> next step class ie. step2
    function nextStep(step) {
        $('.' + step).fadeIn();
    }

    //hide previous step
    //step -> next step class ie. step1
    function hideStep(step) {
        $('.' + step).fadeOut();
    }

});