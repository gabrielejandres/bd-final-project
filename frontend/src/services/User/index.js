import axios from 'axios';

const route = axios.create({
    baseURL: 'localhost:8001/api',
})

export default{

    async register(form) {
        try{
            const response = await route.post('/user', form);
            return response

        }catch(err){
            alert('nao foi possivel criar usuario')
        }
    },

    async updateScore(id) {
        try{
            const response = await route.put(`/user/${id}`);
            return response

        }catch(err){
            alert('não foi possível atualizar os pontos')
        }
    },

}