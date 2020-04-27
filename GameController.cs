using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.SceneManagement;

public class GameController : MonoBehaviour
{
    [Header("Game")]
    public Player player;
    public GameObject EnemyContainer;
    [Header("UI")]
    public Text healthText;
    public Text ammoText;
    //to keep track of enemy left in canvas
    public Text enemyText;
    //to update the no. of enemy info in canvas
    public Text infoText;//for the gameflow
    private float resetTimer=3f;
    private bool gameOver = false;

    //start method
    void Start()
    {
        //to hide the text before being displayed
        infoText.gameObject.SetActive(false);

    }
    // Update is called once per frame
    void Update()
    {
        healthText.text = "Health: " + player.Health;
        ammoText.text = "Ammo: " + player.Ammo;
        int aliveEnemies = 0;
        foreach (Enemy enemy in EnemyContainer.GetComponentsInChildren<Enemy>())
        {
            if (enemy.Killed == false)
            {
                aliveEnemies++;
            }
        }
        enemyText.text = "Enemies:" + aliveEnemies;
        if (aliveEnemies == 0)
        {
            gameOver = true;
            infoText.gameObject.SetActive(true);
            infoText.text = "You win\nGood Job!";

        }
        if (player.Killed == true)
        {
            gameOver = true;
            infoText.gameObject.SetActive(true);
            infoText.text = "You Lose :(\nTry again!";
        }
        if (gameOver == true)
        {
            resetTimer -= Time.deltaTime;
            if (resetTimer<=0)
            {
                SceneManager.LoadScene("Menu");
            }
        }
    }
}
