import axios from "axios";
export default {
    
    install(Vue)
    {
        let ajax = axios.create({
            baseURL:'http://127.0.0.1:8000/api/v0'
        });
        
        Vue.prototype.$api = {
            url : 'http://127.0.0.1:8000',
            post : async function (path)
            {
                return await ajax.post(path);
            },            
        };        
        Vue.prototype.$ajax = ajax;
    }
} 