using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Player : MonoBehaviour
{
    [Header("Visuals")]
    public Camera playerCamera;

    [Header("Gameplay")]
    public int intialHealth = 100;
    public int intialAmmo = 12;
    public float knockbackForce = 10;
    public float hurtDuration = 0.5f;
    // Start is called before the first frame update
    private int health;
    public int Health { get { return health; } }
    private int ammo;
    public int Ammo { get { return ammo; } }
    private bool killed;//to check if the player is dead
    public bool Killed { get { return killed; } }

    private bool isHurt;
    void Start()
    {
        health = intialHealth;
        ammo = intialAmmo; 
    }

    // Update is called once per frame
    void Update()
    {
        if (Input.GetMouseButtonDown(0))
        {   //to check if we have ammo and are alive to shoot
            if (ammo > 0 && Killed==false)
            {
                ammo--;
                GameObject bulletObject = ObjectPoolingManager.Instance.GetBullet(true);//the bullet is being spawn by the player
                bulletObject.transform.position = playerCamera.transform.position + playerCamera.transform.forward;
                bulletObject.transform.forward = playerCamera.transform.forward;
            }
        }
    }
    //Check for collisions.
    private void OnTriggerEnter(Collider otherCollider)
    {
        //Collect the ammoCrate
        if (otherCollider.GetComponent<AmmoCrate>() != null)
        {
            AmmoCrate ammoCrate = otherCollider.GetComponent<AmmoCrate>();
            ammo += ammoCrate.ammo;
            Destroy(ammoCrate.gameObject);
        }
        else if (otherCollider.GetComponent<HealthCrate>() != null)
        {   
            //to check if we are colliding with health crrate and to collect it
            HealthCrate healthCrate = otherCollider.GetComponent<HealthCrate>();
            health += healthCrate.health;
            Destroy(healthCrate.gameObject);
        }


        if (isHurt == false)
        {
            //to tell the player what has damaged him
            GameObject hazard = null;
            if (otherCollider.GetComponent<Enemy>() != null)
            { //touching the enemy
                //if we are hit by the enemy
                Enemy enemy = otherCollider.GetComponent<Enemy>();
                if (enemy.Killed == false)//to check if the enemy is killed or not also avoid being hurted by a dead enemy
                {
                 hazard = enemy.gameObject;
                 health -= enemy.damage;
                }
            }
            else if (otherCollider.GetComponent<bullets>() != null)
            {
                //to check if the bullet is still harmful to the player
                bullets bullet = otherCollider.GetComponent<bullets>();
                if (bullet.ShotByPlayer == false)
                {
                    //if the bullet is not shot by the player it will harm them 
                    hazard = bullet.gameObject;
                    health -= bullet.damage;
                    bullet.gameObject.SetActive(false);
                }
            }
            if (hazard != null)
            {
                isHurt = true;
                //perform the knockback effect
                //a direction from enemy to player to knock back
                Vector3 hurtDirection = (transform.position - hazard.transform.position).normalized;
                Vector3 knockbackDirection = (hurtDirection + Vector3.up).normalized;
                GetComponent<ForceReceiver>().AddForce(knockbackDirection, knockbackForce);
                //calls the routine once hurt
                StartCoroutine(HurtRoutine());

            }
            if (health <= 0)
            {
                if (killed == false)
                {
                    killed = true;
                    OnKill();
                }
            }
        }
    }
    //to wait for a little bit before the player can be hurt again
    IEnumerator HurtRoutine()
    {
        yield return new WaitForSeconds(hurtDuration);
        isHurt = false;
    }
    private void OnKill()
    {
        //to stop player from moving
        GetComponent<CharacterController>().enabled = false;
        //to stop player from shooting
        GetComponent<UnityStandardAssets.Characters.FirstPerson.FirstPersonController>().enabled = false;
    }
}
