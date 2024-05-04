using UnityEngine;
using UnityEngine.Networking;
using System.Collections;
using UnityEngine.UI;
using TMPro;


public class HighScoreManager : MonoBehaviour
{
    public static HighScoreManager Instance { get; private set; }

    public TMP_InputField playerNameInput;
    public void AddHighScore(string name, int score)
    {
        StartCoroutine(SendHighScore(name, score));
    }


    private IEnumerator SendHighScore(string name, int score)
    {
        WWWForm form = new WWWForm();
        form.AddField("player_name", name);
        form.AddField("total_score", score);


        using (UnityWebRequest www = UnityWebRequest.Post("http://localhost/HighScoreAdder", form))
        {
            yield return www.SendWebRequest();

            if (www.isNetworkError || www.isHttpError)
            {
                Debug.LogError(www.error);
            }
            else
            {
                Debug.Log("High score submitted successfully");
            }
        }
    }
}
