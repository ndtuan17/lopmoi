function makeLoginForm(form, path, redirectTo) {
  const emailInput = form.querySelector('input[name="email"]');
  const passwordInput = document.querySelector('input[name="password"]');
  
  form.addEventListener('submit', async event => {
    event.preventDefault();
    const res = await fetch(path, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        email: emailInput.value,
        password: passwordInput.value
      })
    });

    if (res.status >= 200 && res.status <= 299) {
      const jwt = await res.text();
      localStorage.setItem('token', jwt);
      document.cookie = 'token=' + jwt + '; Max-Age=' + (3600 * 24 * 30);
      window.open(redirectTo, '_self');
    } else {
      alert('status: ' + res.status + ', Message: ' + res.statusText);
    }
  })
}

function makeLogoutButton(button, redirectTo){
  console.log('vao make logout button');
  button.addEventListener('click', event => {
    console.log('clicked2');
    document.cookie = 'token=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT';
    localStorage.removeItem('token');
    window.open(redirectTo, '_self');
  });
}