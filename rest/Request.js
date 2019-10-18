export class HttpRequest {

    static request(method, path, params = {}) {

        const http = new XMLHttpRequest();

        return new Promise((resolve, reject) => {

            http.onreadystatechange = () => {
                if (http.readyState === XMLHttpRequest.DONE) {
                    if (http.status === 200) {
                        resolve(http);
                    } else {
                        reject(http.status);
                    }
                } else {
                    reject(http.readyState);
                }
            };

            http.onerror = (err) => {
                reject(err);
            };

            http.open(method, path);
            http.send(params);

        });

    }

    static get(path, callback, params = {}) {

        HttpRequest.request("GET", path, params).then((http) => {
            callback(JSON.parse(http.responseText));
        }).catch(err => {
            console.error(err)
        });

    }

    static post(path, callback, params = {}) {

        HttpRequest.request("POST", path, params).then((http) => {
            callback(JSON.parse(http.responseText));
        }).catch(err => {
            console.error(err);
        });

    }

    static put(path, callback, params = {}) {

        HttpRequest.request("PUT", path, params).then(() => {
            callback(JSON.parse(http.responseText));
        }).catch(err => {
            console.error(err);
        });

    }

    static delete(path, callback, params = {}) {

        HttpRequest.request("DELETE", path, params).then(()=>{
            callback(JSON.parse(http.responseText));
        }).catch(err=>{
            console.error(err);
        });

    }

}