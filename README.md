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
   - Click on the "Databases" tab and create a new database for your game.

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
   - Open the scripts responsible for database connection (e.g., QuestionManager.cs).
   - Update the connection settings to point to your local WAMP server and database.

5. **Build and Run**:
   - Build the game for your desired platform (e.g., Windows, macOS).
   - Run the game and start playing!


### Adding Questions to Database

1. **Use PHP Script**:
   - Locate the provided PHP script (`mass_adder.php`) in the WAMP/PHP folder of the repository.

2. **Configure Script**:
   - Open the `mass_adder.php` script in a text editor.

3. **Update Database Connection**:
   - Update the database connection settings in the script to match your WAMP server configuration.
   - Modify the database name, username, password, and hostname as needed. (This is usually user: root, no password)

4. **Run Script**:
   - Open a web browser and navigate to `http://localhost/mass_adder.php`.
   - This will execute the PHP script and add the questions to your database.

5. **Verify Data**:
   - After running the script, verify that the questions have been successfully added to your database by checking phpMyAdmin.

6. **Optional**: You can modify the PHP script to handle additional functionalities such as error handling, input validation, or bulk data insertion if needed.
