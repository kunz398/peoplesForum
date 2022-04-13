/***
    let max = 4;
 let validationJson = '{"validationJson":[' +
        '{"id":"fname","msg":"fnameMsg","valdationType":"required|min:2|alpha" },' +
        '{"id":"lname","msg":"lnameMsg","valdationType":"required|min:2|alpha" }' +
        ']}';
 formSteps(max,validationJson);
 $('#finshStep').on('click', function (e) {
        e.preventDefault();
        alert("FINITO");
    });
 * @type {number}
 */
var clickCounter = 1;

function formStepsHide(max) {
    $("#finshStep").css("display", "none");
    for (let i = 2; i <= max; i++) {
        $("#step_" + i).css("display", "none");
    }
    $("#previousStep").attr("disabled", true);
}

function formSteps(max, validationJson ) {
    formStepsHide(max);
    $('#nextStep').on('click', function () {
        let isvalid = [];
        let json = JSON.parse(validationJson);
        let jsonSize = json.validationJson.length;
        for(let i =0; i < jsonSize; i++)
        {
            if (parseInt(json.validationJson[i].step) == parseInt($("#nextStep").attr('data-step')))
            {
                isvalid.push(validationForm( json.validationJson[i].id,  json.validationJson[i].msg,  json.validationJson[i].valdationType));
            }
        }
        if (jQuery.inArray("false", isvalid) != -1) {
            // no next
        } else {
            if (clickCounter < max) {
                clickCounter++;
                //console.log(clickCounter);
                $("#previousStep").attr("disabled", false);
                $(this).attr('data-step', clickCounter);
                $("#step_" + (parseInt(clickCounter) - 1)).css("display", "none");
                $("#step_" + clickCounter).css("display", "block");

                if (clickCounter >= max) {
                    $("#finshStep").css("display", "inline-flex");
                    $("#nextStep").css("display", "none");
                } else {
                    $("#finshStep").css("display", "none");
                    $("#nextStep").css("display", "inline-flex");
                }
            }
        }
    });

    $('#previousStep').on('click', function () {
        if (clickCounter > 1) {
            $("#previousStep").attr("disabled", false);
            $("#step_" + clickCounter).css("display", "none");
            $("#step_" + (parseInt(clickCounter) - 1)).css("display", "inline-flex ");
            $("#nextStep").attr('data-step', clickCounter - 1);
            clickCounter--;
            //console.log(clickCounter);
        }
        if (clickCounter <= 1) {
            $("#previousStep").attr("disabled", true);
        }
        if (clickCounter < max) {
            $("#nextStep").html('Next Step  <span class="mdi mdi-arrow-right-bold-circle-outline mdi-24px"></span>');
            $("#finshStep").css("display", "none");
            $("#nextStep").css("display", "inline-block");
        }
    });

}
