class HttpRequest{

    constructor(){

        this._xhttp = new XMLHttpRequest;

    }

    xmlHttpGet(url, callback, param = ''){

        this._xhttp.onreadystatechange = callback;

        this._xhttp.open('GET', url+param, true);
        this._xhttp.send();

    }

    xmlHttpPost(url, callback, param = ''){

        this._xhttp.onreadystatechange = callback;

        this._xhttp.open('POST', url, true);

        //Caso os parametros não forem passados com formdata o setRequestHeader é necessario
        if(typeof(param) != "object"){
            this._xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        }

        this._xhttp.send(param);

    }

    beforeSend(callback){

        if(this._xhttp.readyState < 4){
            callback();
        }

    }

    complete(callback){

        if(this._xhttp.readyState == 4 && this._xhttp.status == 200){
            callback();
        }

    }

    getResponseText(){

        if(this._xhttp.readyState == 4 && this._xhttp.status == 200){
            return JSON.parse(this._xhttp.responseText);
        }

    }

    upload(){

        return this._xhttp.upload;

    }

}