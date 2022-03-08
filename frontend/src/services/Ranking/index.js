import axios from 'axios';

const route = axios.create({
    baseURL: 'http://localhost:8000/api',
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