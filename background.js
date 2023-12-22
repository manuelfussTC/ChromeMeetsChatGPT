chrome.action.onClicked.addListener(function(tab) {
    chrome.scripting.executeScript({
        target: { tabId: tab.id },
        function: pageScript
    });
});

function pageScript() {
    // Stelle sicher, dass das Formular existiert
    var form = document.getElementById('gptForm');
    if (!form) {
        console.error('Formular nicht gefunden');
        return;
    }

    var name = document.getElementById('name').value;
    var kurzbeschreibung = document.getElementById('kurzbeschreibung').value;

    fetch('http://localhost:9002/script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ name: name, kurzbeschreibung: kurzbeschreibung })
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById('langbeschreibung').value = data.langbeschreibung;
        })
        .catch((error) => {
            console.error('Error:', error);
        });
}
