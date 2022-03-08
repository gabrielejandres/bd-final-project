import axios from 'axios';

const route = axios.create({
    baseURL: 'localhost:8001/api',
})

export default{

    async showRank() {
        try{
            const response = await route.get('/ranking');
            return response

        }catch(err){
            alert('nao foi possivel criar usuario')
        }
    },

}