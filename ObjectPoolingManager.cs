using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ObjectPoolingManager : MonoBehaviour
{
    private static ObjectPoolingManager instance;
    public static ObjectPoolingManager Instance { get { return instance; } }
    public GameObject bulletPrefab;
    public int bulletAmount = 20;
    private List<GameObject> bullets;
    // Start is called before the first frame update
    void Awake()
    {
        instance = this;
        bullets = new List<GameObject>(bulletAmount);
        for (int i = 0; i < bulletAmount; i++)
        {
            GameObject prefabInstance = Instantiate(bulletPrefab);
            prefabInstance.transform.SetParent(transform);
            prefabInstance.SetActive(false);
            bullets.Add(prefabInstance);
        }
        
    }

    // Update is called once per frame
    public GameObject GetBullet(bool shotByPlayer)
    {
        foreach (GameObject bullet in bullets)
        {
            if (!bullet.activeInHierarchy)
            {
                bullet.SetActive(true);
                //whenever we get the reference to the bullet
                bullet.GetComponent<bullets>().ShotByPlayer=shotByPlayer;
                return bullet;
            }
        }
        GameObject prefabInstance = Instantiate(bulletPrefab);
        prefabInstance.transform.SetParent(transform);
        //we are going to use prefab instance instead of bullet
        prefabInstance.GetComponent<bullets>().ShotByPlayer = shotByPlayer;
        bullets.Add(prefabInstance);

        return prefabInstance;
    }
        
}
