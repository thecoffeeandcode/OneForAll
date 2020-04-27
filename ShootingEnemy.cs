using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.AI;

public class ShootingEnemy : Enemy
{
    public AudioSource DeathSound;
    //interval at which the enemy will shoot at the player
    public float shootingInterval = 4f;
    //to ensure enemy shoots when in a specific range
    public float shootingDistance = 3f;
    //we are going to make the enemy dynamically search for player in the game
    public float chasingDistance = 12f;//to keep a cahsing distance for it
    public float chasingInterval=2f;

    private Player player;
    private float shootingTimer;
    private float chasingTimer;
    private NavMeshAgent agent;//to store navmesh reference
    

    // Start is called before the first frame update
    void Start()
    {
        //to find the player in scene
        player = GameObject.Find("Player").GetComponent<Player>();
        agent = GetComponent<NavMeshAgent>();
        //to prevent simultaneous shooting of the enemies
        shootingTimer = Random.Range(0, shootingInterval);
        //tomake the enemy walk towards the player
        agent.SetDestination(player.transform.position);
    }

    // Update is called once per frame
    void Update()
    {   //to stop shooting if the player is Killed
        if(player.Killed==true)
        {
            agent.enabled = false;
            this.enabled = false;
            //to prevent enemy from falling if player killed
            GetComponent<Rigidbody>().isKinematic = true;
        }
        //we write the shooting logic here
        shootingTimer -= Time.deltaTime;
        if (shootingTimer <= 0 && Vector3.Distance(transform.position,player.transform.position)<=shootingDistance)
        {   //now its time to shoot
            shootingTimer = shootingInterval;//to reset the timer
            //now we ned to grab the bullet, so the logic we made for the player to spawn the bullet
            GameObject bullet = ObjectPoolingManager.Instance.GetBullet(false);//enemy didn't shot yet
            //from where the bullet will come from
            bullet.transform.position = transform.position;
            //we need to normalize it as its a direction and it needs to have a size of one
            bullet.transform.forward = (player.transform.position - transform.position).normalized;
            
        }
        //chasing logic
        chasingTimer -= Time.deltaTime;
        //to check timer and the distance
        if (chasingTimer<=0 && Vector3.Distance(transform.position,player.transform.position)<=chasingDistance)
        {
            chasingTimer = chasingInterval;
            agent.SetDestination(player.transform.position);//keeps chasing the player
        }

    }
    protected override void OnKill()
    {
        base.OnKill();
        DeathSound.Play();//to play the death audio
        agent.enabled = false;//disable the navmesh component
        this.enabled = false;//disable the shooting enemy script
        //to make it fall to the ground once we kill it
        transform.localEulerAngles = new Vector3(10, transform.localEulerAngles.y,transform.localEulerAngles.z);

    }
}
