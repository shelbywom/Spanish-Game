### Mario Spanish Learning Game

## Welcome to the Mario Spanish Learning Game! This game combines classic Mario gameplay with educational elements to help you learn Spanish while having fun.

## Installation

### Setting Up WAMP Server

1. **Download WAMP Server**:
   - Go to the [WAMP Server website](http://www.wampserver.com/en/) and download the latest version suitable for your operating system.

2. **Install WAMP Server**:
   - Follow the installation instructions provided on the WAMP Server website.
   - Make sure to choose appropriate configurations during installation.

3. **Start WAMP Server**:
   - After installation, launch WAMP Server.
   - Ensure that the server is running properly by checking the system tray for the WAMP icon.

### Setting Up Database

1. **Database Setup**:
   - Open your preferred web browser and navigate to `http://localhost/phpmyadmin/` to access phpMyAdmin.

2. **Create Database**:
   - Click on the "Databases" tab and create a new database for your game. Title it "spanishquestions".
   - You will need two tables. "questions" and 'high scores". In Questions, you will need 5 rows: Question, Correct Answer, and Inorrect Answer 1,2,3, In The high scores table, you only need two rows, "PlayerName" and "TotalScore".

3. **Import Questions**: (See Adding Questions to Database for additional help)
   - Import the provided array of Spanish learning questions into your database.
   - Make sure the table structure matches the expected format used by the game.

### Unity Setup

1. **Download Unity**:
   - If you haven't already, download and install the Unity game engine from the [Unity website](https://unity.com/).

2. **Clone Repository**:
   - Clone or download the repository containing your Unity game scripts.

3. **Open Project in Unity**:
   - Launch Unity and open the project folder containing your game scripts.

4. **Configure Database Connection**:
   - Open the scripts responsible for database connection (e.g., QuestionManager.cs). You would use a domain like localhost/script.php

5. **Build and Run**:
   - Build the game for your desired platform (e.g., Windows, macOS).
   - Run the game and start playing!


### Adding Questions to Database

1. **Use PHP Script**:
   - Locate the provided PHP script (`MassAdder.php`) in the WAMP/PHP folder of the repository.

2. **Configure Script**:
   - Open the `MassAdder.php` script in a text editor.

3. **Run Script**:
   - Open a web browser and navigate to `http://localhost/MassAdder.php`.
   - This will execute the PHP script and add the questions to your database.

4. **Verify Data**:
   - After running the script, verify that the questions have been successfully added to your database by checking phpMyAdmin.

5. **Optional**: You can modify the PHP script to handle additional functionalities such as error handling, input validation, or bulk data insertion if needed.
