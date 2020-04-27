using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Enemy : MonoBehaviour
{
    public int health = 5;
    public int damage = 5;
    private bool killed =false;
    public bool Killed { get { return killed; } }
    public void OnTriggerEnter(Collider otherCollider)
    {
        if (otherCollider.GetComponent<bullets>() != null)
        {
            //to check u=if the collision is from bullet or not
            bullets bullet = otherCollider.GetComponent<bullets>();
            if (bullet.ShotByPlayer==true)
            {   
                health -= bullet.damage;//to inflict damage
                                        //to disable bullet after use
                bullet.gameObject.SetActive(false);//dis

                if (health <= 0)
                {
                    if (killed==false)
                    {
                        killed = true;
                        //onkill() method
                        OnKill();
                        //to destroy the enemy once it dies
                    }
                    //Destroy(gameObject);
                }

            }
        }
    }
    protected virtual void OnKill()
    {

    }
}   
