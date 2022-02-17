export interface AuthResponse {
    user: {
        id: number,
        name: string,
        email: string,
        password: string;
        password_confirmation: string;
        access_token: string,
        expires_in: number
    },
    
}
