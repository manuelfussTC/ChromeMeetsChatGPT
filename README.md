# Chrome Extension with ChatGPT Integration

This repository contains the code for a Chrome extension that interacts with ChatGPT via a PHP backend. The extension extracts data from web forms and uses it to generate texts automatically using the OpenAI API.

## Features

- 🤖 ChatGPT integration for text generation
- 🌐 Automated data extraction from web forms
- 🔁 Quick communication between the browser extension and PHP backend

## Prerequisites

To use this project, you will need:

- A PHP server capable of making external requests
- An OpenAI API key (you'll need to insert this in the PHP backend)

## Installation

1. **Clone the repository:**

    ```
   git clone git@github.com:manuelfussTC/ChromeMeetsChatGPT.git
    ```



2. **Set up the PHP backend:**
   Place the PHP files on your server. Make sure to insert your OpenAI API key in the relevant section of the PHP script.

3. **Install the Chrome extension:**
- Open `chrome://extensions/` in Google Chrome.
- Enable Developer mode.
- Choose "Load unpacked extension" and select the extension folder.

## Usage

- Fill out the web form on any page.
- Click the extension icon to start data extraction and text generation.
- The generated texts will be displayed in the form.

## Configuration

To customize the extension, edit the `background.js` file as needed.

## Contributing

Feel free to contribute to this project! Any contribution, whether it be new ideas, code improvements, or bug reports, is warmly welcomed.

## License

This project is under MIT License.

---

Have fun experimenting! 🚀
