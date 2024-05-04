using UnityEngine;
using UnityEngine.SceneManagement;
using TMPro;
using UnityEngine.UI;

public class GameManager : MonoBehaviour
{
    public static GameManager Instance { get; private set; }

    public int world { get; private set; }
    public int stage { get; private set; }
    public int lives { get; private set; }
    public int coins { get; private set; }
    public int CalculateTotalScore()
    {
        // Calculate the total score based on your game logic
        return coins + lives * 100;
    }


    public TextMeshProUGUI coinsText;
    public TextMeshProUGUI livesText;

    private void Awake()
    {
        if (Instance != null)
        {
            DestroyImmediate(gameObject);
        }
        else
        {
            Instance = this;
            DontDestroyOnLoad(gameObject);
        }
    }

    private void OnDestroy()
    {
        if (Instance == this)
        {
            Instance = null;
        }
    }

    private void Start()
    {
        Application.targetFrameRate = 60;

        NewGame();
    }

    public void NewGame()
    {
        lives = 3;
        coins = 0;

        UpdateUI();

        LoadLevel(1, 1);
    }

    public void GameOver()
    {
        // Submit high score
        HighScoreManager.Instance.AddHighScore("PlayerName", CalculateTotalScore());

        // TODO: Show game over screen

        Debug.Log("Game Over!");
        NewGame();
    }


    public void LoadLevel(int world, int stage)
    {
        this.world = world;
        this.stage = stage;

        SceneManager.LoadScene($"{world}-{stage}");
    }

    public void NextLevel()
    {
        LoadLevel(world, stage + 1);
    }

    public void ResetLevel(float delay)
    {
        CancelInvoke(nameof(ResetLevel));
        Invoke(nameof(ResetLevel), delay);
    }

    public void ResetLevel()
    {
        lives--;

        Debug.Log("Lives: " + lives); // Add debug statement

        if (lives > 0)
        {
            LoadLevel(world, stage);
        }
        else
        {
            GameOver();
        }
    }

    public void AddCoin()
    {
        coins++;

        if (coins >= 100)
        {
            coins -= 100;
            AddLife();
        }

        UpdateUI();
    }

    public void AddLife()
    {
        lives++;

        UpdateUI();
    }

    public void UpdateUI()
    {
        if (coinsText != null)
        {
            coinsText.text = "Coins: " + coins.ToString();
        }

        if (livesText != null)
        {
            livesText.text = "Lives: " + lives.ToString();
        }
    }
}
