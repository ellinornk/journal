async function postData() {
  const formData = new FormData();
  formData.append('lastName', 'Orb');
  formData.append('firstName', 'Jesper');
  const response = await fetch('post_data.php', {
    method: 'POST',
    body: formData
  });
  const data = await response.json();
}
