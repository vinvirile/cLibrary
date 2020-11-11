const cc = {
    about: "This was created by cagycee. ~more info~",
    version: `${0.01}alpha`,
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


//TESTING AREA
cc.log("nlarr", ["Line1", "Line2", "Line3", "Line4", ["Array2","Line1","Line2"]]);
cc.log("test");

cc.log(cc.Math.roundToCx(3432.34643223, 1000));
