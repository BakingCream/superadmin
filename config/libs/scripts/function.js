function generateRandomPassword() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()_+-={}[]|:;"<>,.?/~`0123456789';
    let password = '';
  
    while (password.length < 8 || !(/[A-Z]/.test(password) && /[a-z]/.test(password) && /[!@#$%^&*()_+\-={}[\]|:;"<>,.?/~`]/.test(password) && /[0-9]/.test(password))) {
      password = '';
      for (let i = 0; i < 8; i++) {
        password += chars[Math.floor(Math.random() * chars.length)];
      }
    }
  
    return password;
}