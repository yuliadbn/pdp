var obj = {

    times: function (a, b) {
        return a * b
    },

    plus: function (a, b) {
        return a + b;
    },

    minus: function (a, b) {
        return a - b;
    },

    divide: function (a, b) {
        return a / b;
    },

    solver: function (expression) {
        var a;
        //check if the first element of array expression is an array, if so call recursive solver function and pass this first element as parameter into it.
        if (Array.isArray(expression[0])){
            a = this.solver(expression[0]);
        } else {
            a = expression[0];
        }
        var b;
        //check if the third element of array expression is an array, if so call recursive solver function and pass this third element as parameter into it.
        if (Array.isArray(expression[2])){
            b = this.solver(expression[2]);
        } else {
            b = expression[2];
        }
        //variable c can only be plus, minus, times, divide
        var c = expression[1];
       //convert operation to function call
        return eval("this."+c)(a, b);
    }
}


var expression = [[3, "plus",5], "times", [6, "minus", 2]];
console.log("Result = "+obj.solver(expression));
