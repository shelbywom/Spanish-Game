using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;
using TMPro;
using System;

public class QuestionManager : MonoBehaviour
{
    public GameObject questionPanel;
    public TextMeshProUGUI questionText;
    public List<Button> answerButtons;

    private List<Question> questions = new List<Question>();
    private Question currentQuestion;

    private void Start()
    {
        questionPanel.SetActive(false);
        foreach (Button button in answerButtons)
        {
            button.gameObject.SetActive(false);
        }

        // Call GetQuestions to populate the questions list
        StartCoroutine(GetQuestions());
    }

    IEnumerator GetQuestions()
    {
        string uri = "http://localhost/QuestionGenerator.php";
        using (UnityWebRequest webRequest = UnityWebRequest.Get(uri))
        {
            // Request and wait for the desired page.
            yield return webRequest.SendWebRequest();

            if (webRequest.result == UnityWebRequest.Result.ConnectionError)
            {
                Debug.Log(": Error: " + webRequest.error);
            }
            else
            {
                // Parse the response
                string[] pages = webRequest.downloadHandler.text.Split('\n');
                foreach (string page in pages)
                {
                    // Skip empty lines
                    if (string.IsNullOrWhiteSpace(page))
                        continue;

                    // Parse each line to extract question data
                    string[] data = page.Split(';');
                    if (data.Length >= 5) // Ensure all required fields are present
                    {
                        string questionText = data[0];
                        string correctAnswer = data[1];
                        string[] incorrectAnswers = new string[] { data[2], data[3], data[4] };

                        // Create a new Question object and add it to the questions list
                        Question question = new Question(questionText, correctAnswer, incorrectAnswers);
                        questions.Add(question);
                    }
                    else
                    {
                        Debug.LogWarning("Incomplete data for a question: " + page);
                    }
                }
            }
        }
    }

    public void ShowQuestion()
    {
        if (questionPanel == null)
        {
            Debug.LogError("Question Panel is not assigned in the Inspector.");
            return;
        }

        if (questions.Count == 0)
        {
            Debug.LogError("No questions available.");
            return;
        }

        questionPanel.SetActive(true);
        Time.timeScale = 0;

        currentQuestion = GetRandomQuestion();

        if (currentQuestion == null)
        {
            Debug.LogError("Current question is null. Check if GetQuestions method is working correctly.");
            return;
        }

        if (questionText == null)
        {
            Debug.LogError("Question Text is not assigned in the Inspector.");
            return;
        }

        questionText.text = currentQuestion.question;

        for (int i = 0; i < answerButtons.Count; i++)
        {
            if (answerButtons[i] == null)
            {
                Debug.LogError("Answer Button at index " + i + " is not assigned in the Inspector.");
                continue;
            }

            TextMeshProUGUI buttonText = answerButtons[i].GetComponentInChildren<TextMeshProUGUI>();

            if (buttonText == null)
            {
                Debug.LogError("TextMeshProUGUI component is missing on Answer Button at index " + i);
                continue;
            }

            buttonText.text = currentQuestion.answers[i];
            answerButtons[i].gameObject.SetActive(true);
            answerButtons[i].onClick.AddListener(() => CheckAnswer(buttonText.text));
        }
    }

    private Question GetRandomQuestion()
    {
        if (questions.Count == 0)
        {
            Debug.LogError("No questions available.");
            return null;
        }

        int randomIndex = UnityEngine.Random.Range(0, questions.Count);
        return questions[randomIndex];
    }

    private void CheckAnswer(string selectedAnswer)
    {
        if (selectedAnswer == currentQuestion.correctAnswer)
        {
            // Award mystery item and coins
            Debug.Log("Correct answer selected. Rewarding player...");
        }
        else
        {
            // Handle incorrect answer (nothing to do here since the game will continue)
            Debug.Log("Incorrect answer selected.");
        }

        questionPanel.SetActive(false);
        Time.timeScale = 1;

        foreach (Button answerButton in answerButtons)
        {
            answerButton.gameObject.SetActive(false);
        }
    }
}

[System.Serializable]
public class Question
{
    public string question;
    public List<string> answers;
    public string correctAnswer;

    public Question(string question, string correctAnswer, string[] incorrectAnswers)
    {
        this.question = question;
        this.correctAnswer = correctAnswer;
        this.answers = new List<string>(incorrectAnswers);
        this.answers.Add(correctAnswer);
        ShuffleAnswers();
    }

    private void ShuffleAnswers()
    {
        for (int i = 0; i < answers.Count; i++)
        {
            string temp = answers[i];
            int randomIndex = UnityEngine.Random.Range(i, answers.Count);
            answers[i] = answers[randomIndex];
            answers[randomIndex] = temp;
        }
    }
}
