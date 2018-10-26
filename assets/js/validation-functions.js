function validarTelefono(inputId){
    $(inputId).on('keydown keypress', function(e) {

        //alert(e.which);

        // keys: 
        //  • backspace   [8],
        //  • tab         [9], 
        //  • enter      [13],
        //  • escape     [27],
        //  • space      [32],
        //  • delete     [46], and
        //  • +         [43/107/187]
        //  • -         [45/109/189]
        //  • .         [110/190]
        //  • F5        [116]
        var allowed_keys = [8, 9, 13, 27, 32, 43, 45, 46, 110, 107, 109, 116, 187, 189, 190];
        if (
            // Allow "allowed_keys" array but whitout shift, ctrl or cmd key pressed
            (($.inArray(e.which, allowed_keys) !== -1) && !e.shiftKey) ||
             // Allow: Ctrl+A, Command+A
            (e.which === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.which >= 35 && e.which <= 40) ||
            // Allow: Shift + Home, Shift + End
            (e.shiftKey && (e.which == 35 || e.which === 36)) ||
            // Allow: Control + f5 
            (e.ctrlKey && e.which==116)
           ) {
                // let it happen, don't do anything
//                  alert("Return");
                return;
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.which < 48 || e.which > 57)) && (e.which < 96 || e.which > 105) ||
            (e.which === 186 || e.which === 222)){
//            alert("PreventDefault");
            e.preventDefault();
        }
    });
}


function validarNombres(inputId){
    $(inputId).on('keydown keypress', function(e) {
        //alert("Type: " + event.type + ", 1st: " + e.which);
        if(event.type == 'keydown'){
            // keys: 
            //  • backspace   [8],
            //  • tab         [9], 
            //  • enter      [13],
            //  • escape     [27],
            //  • space      [32],
            //  • delete     [46], and
            //  • +         [43/107/187]
            //  • -         [45/109/189]
            //  • .         [110/190]
            //  • F5        [116]
            //  • ñ         [192]
            var allowed_keys = [8, 9, 13, 27, 32, 46, 116, 192];
            if (
                // Allow "allowed_keys" array but whitout shift, ctrl or cmd key pressed
                (($.inArray(e.which, allowed_keys) !== -1) && !e.shiftKey) ||
                 // Allow: Ctrl+A, Command+A
                (e.which === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.which >= 35 && e.which <= 40) ||
                // Allow: Shift + Home, Shift + End
                (e.shiftKey && (e.which == 35 || e.which === 36 || e.which === 9)) ||
                // Allow: Control + f5 
                (e.ctrlKey && e.which==116)
               ) {
                    // let it happen, don't do anything
                    //alert("Return");
                    return;
            }
        }

        if(event.type == 'keypress'){
            // keys: 
            //  • backspace   [8],
            //  • tab         [9],
            //  • enter      [13],
            //  • escape     [27],
            //  • space      [32],
            //  • delete     [46], and
            //  • +         [43/107/187]
            //  • -         [45/109/189]
            //  • .         [110/190]
            //  • ñ         [241]
            var allowed_keys = [13, 27, 32, 241];
            if (
                // Allow "allowed_keys" array but whitout shift, ctrl or cmd key pressed
                (($.inArray(e.which, allowed_keys) !== -1) && !e.shiftKey) ||
                 // Allow: Ctrl+A, Command+A
                (e.which === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.which >= 35 && e.which <= 40) ||
                // Allow: Shift + Home, Shift + End
                (e.shiftKey && (e.which == 35 || e.which === 36)) ||
                // Allow: Control + f5 
                (e.ctrlKey && e.which==116)
               ) {
                    // let it happen, don't do anything
                    //alert("Return");
                    return;
            }
        }

        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.which < 65 || e.which > 90)) && (e.which < 97 || e.which > 122) ||
            (e.which === 186 || e.which === 222 || e.which === 46)){
//            alert("PreventDefault");
            e.preventDefault();
        }

    });
}