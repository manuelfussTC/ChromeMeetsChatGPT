// Diese Funktion wird aufgerufen, wenn du auf das Erweiterungssymbol klickst
chrome.browserAction.onClicked.addListener(function(tab) {
    // Führe das Skript im aktuellen Tab aus
    chrome.tabs.executeScript(tab.id, {
        code: `
            var name = document.getElementById('name').value;
            var kurzbeschreibung = document.getElementById('kurzbeschreibung').value;
            
            fetch('http://deine-server-url/script.php', {
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
        `
    });
});
