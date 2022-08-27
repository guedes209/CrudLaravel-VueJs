
export const headers = {
    "Content-type": "application/json; charset=UTF-8"
}

export const URL_API = import.meta.env.VITE_URL_API;

export function requestGet(url) {
    return new Promise((resolve, reject) => {
        fetch(URL_API+url, {
            method: 'GET', 
            headers: headers
        })
        .then(response => response.json())
        .then((json) => {
            if(json.success){
                return resolve(json);
            } else {
                return resolve(json)
            }
        })
        .catch(function(response) {        
            return resolve(response);
        });
    })
    
}
export function requestPost(url, data) {
    return new Promise((resolve, reject) => {
        fetch(URL_API+url, {
            method: 'POST', 
            body: JSON.stringify({...data}),
            headers: headers
            })
        .then(response => response.json())
        .then((json) => {
            if(json.success){
                return resolve(json);
            } else {
                return resolve(json)
            }
        })
        .catch(function(response) {        
            return resolve(response);
        });
    })
}