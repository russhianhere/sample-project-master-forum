function Subscribe(id) {


    document.getElementById("subscribe"+id).classList.add('disabled');
    document.getElementById("subscribe"+id).innerHTML = "Вы успешно подписались!";

    var el = document.getElementById("subcount"+id);
    var val = +el.innerHTML;

    el.innerHTML = val + 1;

    var msg = "User="+id;

    $.ajax({

    
        type: 'POST',
        
        url: 'Subscribe',
        
        data: msg,
    
    });

        
}

function Unsubscribe(id) {


    document.getElementById("subscribe"+id).classList.add('disabled');
    document.getElementById("subscribe"+id).innerHTML = "Вы успешно отписались!";

    var el = document.getElementById("subcount"+id);
    var val = +el.innerHTML;

    el.innerHTML = val - 1;

    var msg = "User="+id;

    $.ajax({

    
        type: 'POST',
        
        url: 'Subscribe',
        
        data: msg,
    
    });

        
}


function Like(id,author) {

    document.getElementById(id).classList.add('disabled');
    document.getElementById("button"+id).innerHTML = "Вы проголосовали";

    var el = document.getElementById("label"+id);
    var val = +el.innerHTML;

    el.innerHTML = val + 1;

    var msg = "Post="+id+"&Author="+author;

    $.ajax({

    
        type: 'POST',
        
        url: 'Rate',
        
        data: msg,
    
    });

    
}


function Unlike(id,author) {

    document.getElementById(id).classList.add('disabled');
    document.getElementById("button"+id).innerHTML = "Оценка убрана!";

    var el = document.getElementById("label"+id);
    var val = +el.innerHTML;

    el.innerHTML = val - 1;

    var msg = "Post="+id+"&Author="+author;

    $.ajax({

    
        type: 'POST',
        
        url: 'Rate',
        
        data: msg,
    
    });

    
}


function Comment(id) {

    var msg = $('#Comment'+id).serialize();

    $.ajax({

    
        type: 'POST',
        
        url: 'Comment',
        
        data: msg,
    
    });

    location.reload();
    
}