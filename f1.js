const cc = {
    about: "This was created by cagycee. ~more info~",
    version: `${0.04}.${5}alpha`,
    log: (param1, param2) => {
        if (param2===undefined) {
            console.log(param1);
        } else {
            switch (param1) {
                case "nlarr":
                    for (var i = 0; i < param2.length; i++) {
                        console.log(param2[i] + "\n");
                    }
                    break;
                default:
                    console.log(param2);
                    break;
            }
        }
    },
    sp: " ",
    nl: "\n",
    Math: 
        {
            roundToCx: (num, place) => {
                if (place) {
                    return Math.round((num) * place) / place;
                } else {
                    return false;
                }
            },
            roundToS: (num, place) => {
                if (place) {
                    //incomplete
                }
            }

        },
    HTML:
        {
            id: (id) => {
                if (id) {
                    return document.getElementById(id);
                } else {
                    return false;
                }
            },
            replace: (id, html) => {
                if (id) {
                    if (html) {
                        document.getElementById(id).innerHTML=html;
                    } else {
                        return document.getElementById(id).innerHTML='';
                    }
                } else {
                    return false;
                }
            },
            value: (id, type) => {
                if (id) {
                    if (type==='html') {
                        return document.getElementById(id).innerHTML;
                    } else if (type==='input') {
                        return document.getElementById(id).value;
                    }
                }
            }
            
        },
    Array: 
        {
            list: (arr) => {
                if (arr) {
                    for (var i = 0; i < arr.length; i++) {
                        return arr[i] + '\n';
                    }
                }
            }
        }
};