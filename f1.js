const cc = {
    about: "This was created by cagycee. ~more info~",
    version: `${0.03}alpha`,
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
            }
        }
}