using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class bullets : MonoBehaviour
{
    public float speed = 800f;
    public float lifeDuration = 10f;
    public int damage = 5;
    private float lifeTimer;
    // Start is called before the first frame update
    //the bullets from the player
    private bool shotByPlayer;
    public bool ShotByPlayer { get { return shotByPlayer; } set { shotByPlayer = value; } }

    void OnEnable()
    {
        lifeTimer = lifeDuration;
    }

    // Update is called once per frame
    void Update()
    {
        //make the bullet move
        transform.position += transform.forward * speed * Time.deltaTime;
        //check if the bullet should be destroyed
        lifeTimer -= Time.deltaTime;
        if (lifeTimer <= 0)
        {
            gameObject.SetActive(false);
        }
    }
}
