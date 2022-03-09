import axios from 'axios';

const route = axios.create({
    baseURL: 'http://localhost:8000/api',
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

    async updateScore(id, form) {
        try{
            const response = await route.put(`/user/${id}`, form);
            return response

        }catch(err){
            alert('não foi possível atualizar os pontos')
        }
    },

}