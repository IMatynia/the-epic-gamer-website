TYPE_SPEED = 20;
magic_static = "";

function type_out_letters(what, where)
{
    if(what == "")
    {
        console.log("Hacking finished...");
        return 
    }
    var char = what[0];
    what = what.slice(1, what.length)
    if(char == "@")
    {
        line_break = document.createElement("br");
        where.appendChild(line_break);
    }
    else if(char == "[")
    {
        span = document.createElement("span");
        where.appendChild(span);
        where = span
    }
    else if(char == "]")
    {
        where = where.parentElement;
    }
    else
    {
        where.innerHTML += char;
    }
    setTimeout(type_out_letters, TYPE_SPEED, what, where);
}