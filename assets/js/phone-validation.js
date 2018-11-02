
function validarTelefono(inputId){

    $(inputId).on('keypress keydown', function(e) {
        //alert("Character was typed.\nIt was: " + String.fromCharCode(e.which) + "\ne.which: " + e.which);

        if ($.inArray(String.fromCharCode(e.which), ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '+', '-', ' ']) !== -1){
            return;
        } else if($.inArray(e.which, [13]) !== -1) {
            return;
        }

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40) ||
            // Allow: Shift + Home, Shift + End
            (e.shiftKey && (e.keyCode == 356 || e.keyCode === 36))) {
                 // let it happen, don't do anything
                 return;
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
        /*
        if (e.which !== 0) {
            alert("Character was typed. It was: " + String.fromCharCode(e.which));
        }
        */
    });
}


function validarNombres(inputId){

    $(inputId).on('keydown', function(e) {
        //alert(e.which + " " + e.keyCode);

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40) ||
            // Allow: Shift + Home, Shift + End
            (e.shiftKey && (e.keyCode == 356 || e.keyCode === 36))) {
                 // let it happen, don't do anything
                 return;
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }

    });
}


        /*
            $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]!==-1) ||
             // Allow: Ctrl+A/C/V/X, Command+A/C/V/X
            (/65|67|86|88/.test(e.keyCode) && (e.ctrlKey === true || e.metaKey === true)) &&
            (!0===e.ctrlKey||!0===e.metaKey)||
            35<=e.keyCode&&40>=e.keyCode||
            (e.shiftKey||48>e.keyCode||57<e.keyCode)&&
            (96>e.keyCode||105<e.keyCode)&&
            e.preventDefault()
        });*/
        //alert(e.which);
        /*if ((e.which>=65 && e.which<=90) || 
            (e.which>=97 && e.which<=122) || 
            ($.inArray(e.which, [32, 241, 209, 225, 193, 233, 201, 237, 205, 243, 211, 250, 218]) !== -1)
            ){
            return;
        }else {
            e.preventDefault();
        }

        $(function() {
            $('#staticParent').on('keydown', '#child', function(e){

        })*/
        /*
        if (e.which !== 0) {
            alert("Character was typed. It was: " + String.fromCharCode(e.which));
        }
        */