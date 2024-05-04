using UnityEngine;
using UnityEngine.UI;
using TMPro;


public class HighScoreInputHandler : MonoBehaviour
{
    public HighScoreManager highScoreManager; // Reference to the HighScoreManager script
    public GameManager gameManager; // Reference to the GameManager script
    public TMP_InputField inputField; // Reference to the InputField component

    // Method to be called when the player submits their name
    public void SubmitName()
    {
        string playerName = inputField.text; // Get the text from the input field
        highScoreManager.AddHighScore(playerName, GameManager.Instance.CalculateTotalScore()); // Pass the player's name and score to the HighScoreManager
        inputField.text = ""; // Clear the input field after submission
    }
}
